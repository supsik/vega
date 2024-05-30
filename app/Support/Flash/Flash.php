<?php

namespace App\Support\Flash;

use Illuminate\Contracts\Session\Session;

class Flash
{
    public const  MESSAGE_SESSION_KEY = 'project_session_key';
    public const  MESSAGE_CLASSES_KEY = 'project_classes_key';

    public function __construct(protected Session $session)
    {
    }

    public function get(): ?FlashMessage
    {
        $message = $this->session->get(self::MESSAGE_SESSION_KEY);

        if (!$message) {
            return null;
        }

        return new FlashMessage(
            $message,
            $this->session->get(self::MESSAGE_CLASSES_KEY)
        );
    }

    public function success(string $message): void
    {
        $this->flash($message, 'success');
    }

    public function danger(string $message): void
    {
        $this->flash($message, 'danger');
    }

    private function flash(string $message, string $name): void
    {
        $this->session->flash(self::MESSAGE_SESSION_KEY, $message);
        $this->session->flash(self::MESSAGE_CLASSES_KEY, config("flash.{$name}"));
    }
}
