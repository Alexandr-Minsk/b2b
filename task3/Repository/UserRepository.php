<?php

class UserRepository
{
    /**
     * 3-я функциональность: Возможность получить все статьи конкретного пользователя
     * @param User $user
     * @return array
     */
    public function getAllArticlesByUser(User $user){
        return $user->getArticles();
    }
}