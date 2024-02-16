<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Kind;
use App\Models\User;
use App\Models\Gender;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function publicIndex()
    {
        $cats = Cat::where('status_id', 2 )->orderBy('created_at', 'desc')->paginate(25);
        $user = User::all();
        
        return view('welcome', ['cats' => $cats, 'user' => $user]);
    }

    public function publicShow(Cat $cat)
    {
        return view('public.show', ['cat' => $cat]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        //catsテーブルのuser_idカラムがログインユーザーのidと一致するデータを取得し、ページネーションを利用して登録日時の新しい順に50件ずつ表示
        $cats = Cat::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(50);
    
        // 猫の一覧ページを表示
        // return view('cats.index', ['cats' => $cats]);
        // compact関数を利用して変数をビューに渡す
        return view('cats.index', compact('cats', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //猫の登録ページを表示
        $kinds = Kind::all();
        $genders = Gender::all();
        $statuses = Status::all();
    
        return view('cats.create', compact('kinds', 'genders', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //猫の登録処理
        // requestを受け取り、Catモデルを利用してデータベースに保存
        // バリデーションはリクエストクラスで行うため省略
        $cat = new Cat();
        $cat->user_id = Auth::id();
        $cat->name = $request->name;
        $cat->age = $request->age;
        $cat->kind_id = $request->kind_id;
        $cat->gender_id = $request->gender_id;
        $cat->status_id = $request->status_id;
        $cat->desc = $request->desc;
        $cat->image = $request->file('image')->store('public/cats');
        $cat->save();//データベースに保存

        return redirect()->route('cats.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cat $cat)
    {
        //猫の詳細ページを表示
        return view('cats.show', ['cat' => $cat]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cat $cat)
    {
        //猫の編集ページを表示
        $kinds = Kind::all();
        $genders = Gender::all();
        $statuses = Status::all();
    
        return view('cats.edit', ['cat' => $cat, 'kinds' => $kinds, 'genders' => $genders, 'statuses' => $statuses]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cat $cat)
    {
        //猫の更新処理
        // requestを受け取り、Catモデルを利用してデータベースを更新
        // バリデーションはリクエストクラスで行うため省略
        $cat->name = $request->name;
        $cat->gender_id = $request->gender_id;
        $cat->age = $request->age;
        $cat->kind_id = $request->kind_id;
        $cat->desc = $request->desc;
        $cat->status_id = $request->status_id;
        
        // レコードに登録された古い写真は削除し、新しい写真を登録。画像がアップロードされた場合のみ実行。
        if ($request->file('image')) {
            $cat->image = $request->file('image')->store('public/cats');
        }
        $cat->save();//データベースを更新

        return redirect()->route('cats.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cat $cat)
    {
        //猫の削除処理
        $cat->delete();//データベースから削除

        return redirect('cats.index');
    }
}
