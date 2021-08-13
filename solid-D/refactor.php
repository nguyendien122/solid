<?php

// Tạo interface
interface UserRepositoryInterface
{
    public function getUserFromYesterday(DateInterface $date): array;
}

class UserEloquentRepository implements UserRepositoryInterface
{
    public function getUserFromYesterday(DateInterface $date): array
    {
        return User::where('created_at', '>', $date)
            ->get()
            ->toArray();
    }
}

class UserSqlRepository implements UserRepositoryInterface
{
    public function getUserFromYesterday(DateInterface $date): array
    {
        return \DB::table('users')
            ->where('created_at', '>', $date)
            ->get()
            ->toArray();
    }
}

class UserCsvRepository implements UserRepositoryInterface
{
    public function getUserFromYesterday(DateInterface $date): array
    {
        // 👁 I am accessing the infrastructure
        // from the same method maybe not the best
        $fileName = "users_created_{$date}.csv";
        $fileHandle = fopen($fileName, 'r');

        while (($users[] = fgetscsv($fileHandle, 0, ","))  !== false) {
        }

        fclose($fileHandle);

        return $users;
    }
}

// Xử lý
namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\UserRepositoryInterface',
            'App\Repositories\UserCsvRepository'
        );
    }
}