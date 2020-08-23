<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\User;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $rolesToPermission = [
            'admin' => ['write-message', 'edit-message', 'publish-message'],
            'publisher' => ['publish-message'],
            'editor' => ['edit-message'],
            'writer' => ['write-message', 'edit-own-message']
        ];

        $write = Permission::create(['name' => 'write-message']);
        $edit = Permission::create(['name' => 'edit-message']);
        $editOwnMessage = Permission::create(['name' => 'edit-own-message']);
        $publish = Permission::create(['name' => 'publish-message']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo([$write, $edit, $publish]);

        $publisher = Role::create(['name' => 'publisher']);
        $publisher->givePermissionTo([$publish]);

        $editor = Role::create(['name' => 'editor']);
        $editor->givePermissionTo([$edit]);

        $writer = Role::create(['name' => 'writer']);

        $writer->givePermissionTo([$write, $editOwnMessage]);

        $asAdmin = User::create([
            'name' => 'admin Savani',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        $admin->users()->attach($asAdmin);

        $asWriter = User::create([
            'name' => 'writer Savani',
            'email' => 'writer@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        $writer->users()->attach($asWriter);

        $asEditor = User::create([
            'name' => 'editor Savani',
            'email' => 'editor@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        $editor->users()->attach($asEditor);

        $asPublisher = User::create([
            'name' => 'publisher Savani',
            'email' => 'publisher@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        $publisher->users()->attach($asPublisher);

        collect([
            $asPublisher,
            $asEditor,
            $asWriter,
            $asAdmin
        ])->each(function ($user) {
            $user->posts()->saveMany(
                factory(App\Message::class, 5)->make()
            );
        });
    }
}
