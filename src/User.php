<?php
namespace Appli;
use Appli\Mailer;
class User
{
    public $first_name;
    public $last_name;
    protected $mailer;

    public function getFullName()
    {
        return trim("$this->first_name $this->last_name");
    }
    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
    public function notify($message)
    {
        return $this->mailer->sendMessage($message);
    }
}