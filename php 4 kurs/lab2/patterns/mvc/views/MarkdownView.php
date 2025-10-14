<?php
namespace Mvc\Views;

class MarkdownView
{
    private array $users;

    public function __construct(array $users)
    {
        $this->users = $users;
    }

    public function render(): string
    {
        $markdown = "# Список пользователей\n\n";
        foreach ($this->users as $user) {
            $markdown .= "- **Имя:** {$user->first_name} {$user->last_name}\n";
            $markdown .= "  - Email: `{$user->email}`\n\n";
        }
        return $markdown;
    }
}
