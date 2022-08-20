<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profile;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
         // Varidationを行う
      $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $form = $request->all();
      unset($form['_token']);
      // データベースに保存する
      $profile->fill($form);
      $profile->save();
        return redirect('admin/profile/create');
    }
    
    public function edit(Request $request)
    {
      // Profile Modelからデータを取得する
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
      return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
      public function delete(Request $request)
    {
      // 該当するPrifile  Modelを取得
      $profile = Profile::find($request->id);
      // 削除する
      $profile->delete();
      return redirect('admin/profile/');
    }
    public function update()
    {
    // Validationをかける
      $this->validate($request, Profile::$rules);
      // Profile Modelからデータを取得する
      $profile= Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();
      // 該当するデータを上書きして保存する
      $profile->fill($profile_form)->save();
        return redirect('admin/profile');
    }
}