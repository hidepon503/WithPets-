<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\Kind;
use App\Models\User;
use App\Models\Gender;
use App\Models\Status;

// use App\Http\Requests\CatRequest;
use Illuminate\Support\Facades\Auth;


class CatController extends Controller
{
    public function publicIndex()
    {
        $cats = Cat::where('status_id', 2 )->orderBy('created_at', 'desc')->paginate(25);
        $user = User::all();
        
        return response()->json($response);
        
    }

    public function publicShow(Cat $cat)
    {
        return response()->json($cat);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 認証されたユーザーを取得
        $user = Auth::user();
        // 認証されたユーザーのIDに基づき、猫のデータをページネーションで取得
        $cats = Cat::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(50);

        // 返却するレスポンスデータを配列で構築
        $response = [
            'user' => $user, // ユーザー情報
            'cats' => $cats->items(), // ページネーション結果のデータ部分
            'pagination' => [ // ページネーション情報
                'total' => $cats->total(), // 総アイテム数
                'perPage' => $cats->perPage(), // 1ページあたりのアイテム数
                'currentPage' => $cats->currentPage(), // 現在のページ番号
                'lastPage' => $cats->lastPage(), // 最終ページ番号
            ],
        ];

        // 構築したレスポンスデータをJSON形式で返却
        return response()->json($response); // HTTPステータスコードはデフォルトの200を使用
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

        $response = [
            'kinds' => $kinds,
            'gender' => $genders,
            'statuses' => $statuses
        ];
    
        // return view('cats.create', compact('kinds', 'genders', 'statuses'));
        return response()->json($response);
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
        // 画像が送信されたかを確認
        if ($request->hasFile('image')) {
            // 画像が存在する場合、ストレージに保存し、パスを$cat->imageに設定
            $cat->image = $request->file('image')->store('public/cats');
        } else {
            // 画像が存在しない場合、$cat->imageをnullに設定するか、デフォルト画像のパスを設定
            $cat->image = null; // 画像がない場合はnullを設定
            // もしくはデフォルトの画像パスを設定する
            // $cat->image = 'path/to/default/image.jpg';
        }
        $cat->save();//データベースに保存

        $response = [
            'cat' => $cat
        ];

        // return redirect()->route('cats.index');
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cat $cat)
    {
        //猫の詳細ページを表示
        // return view('cats.show', ['cat' => $cat]);
        return response()->json($cat);
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

        // return redirect()->route('cats.index');
        return response()->json($cat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cat $cat)
    {
        //猫の削除処理
        $cat->delete();//データベースから削除

        // return redirect('cats.index');
        return response()->json(['message' => 'Tweet delete successfully']);
    }
}
