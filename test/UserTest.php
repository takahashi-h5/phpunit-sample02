<?php

use PHPUnit\Framework\TestCase;
use Appli\User;
use Appli\Mailer;
class UserTest extends TestCase
{
    protected $user;
    protected function setUp():void
    {
        $this->user = new User;
    }
    protected function tearDown():void
    {
        unset($this->user);
    }
    public static function setUpBeforeClass():void
    {
    }
    public static function tearDownAfterClass():void
    {
    }
    /** testで始まるメソッドはテストケース */
    public function test_notify()
    {
        $mock = $this->createMock(Mailer::class); // モック対象のクラスを指定
        $mock->method('sendMessage') // モック対象のメソッド名を指定
             ->willReturn('hello help.'); // 返す値を指定        

        $this->user->setMailer($mock); // モックオブジェクトを設定
        $result = $this->user->notify('hogehoge'); // 依存するMailerクラスはモックしている状態
        $this->assertEquals('hello help.', $result);
    }
}