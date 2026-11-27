<?php

/**
 * 画面の転送（ログイン画面へ・ボード一覧へ）のテスト。
 * 転送を Response::redirect()（中で exit する）ではなく、例外か Response で返しているので、テストから確かめられる。
 *
 * @group App
 */
class Test_Controller_Auth extends TestCase
{
	protected function setUp()
	{
		parent::setUp();
		DB::start_transaction();
		Session::destroy();
	}

	protected function tearDown()
	{
		Session::destroy();
		DB::rollback_transaction();
		parent::tearDown();
	}

	public function test_転送の例外は302とLocationヘッダーを返す()
	{
		$e = new HttpRedirectException('auth/login');
		$response = $e->response();

		$this->assertSame(302, $response->status);
		$this->assertStringEndsWith('auth/login', $response->get_header('Location'));
	}
}
