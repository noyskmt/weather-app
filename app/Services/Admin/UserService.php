<?php

namespace App\Services\Admin;

use App\Models\User;

class UserService
{
  private $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }

  /**
   * 管理者のユーザーを取得する
   */
  public function admin()
  {
    return $this->user->where('role', 0)->get();
  }
}
