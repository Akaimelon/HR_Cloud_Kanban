<?php
/**
 * 採用担当者（users テーブル）のモデル。
 */
class Model_User
{
	/**
	 * IDでユーザーのメールアドレスを取得する
	 *
	 * 画面のヘッダーに、どのアカウントでログインしているかを出すため。
	 *
	 * @param  int $user_id
	 * @return string|null  見つからなければnull
	 */
	public static function find_email($user_id)
	{
		$row = \DB::select('email')
			->from('users')
			->where('id', '=', $user_id)
			->execute()
			->current();

		return $row ? $row['email'] : null;
	}
}
