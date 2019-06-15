<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(ConfigurationSeeder::class);
        
        factory(User::class)->create([
            'name' => 'Frank Aguirre',
            'email' => 'faguirre@soenac.com',
            'api_token' => hash('sha256', 'nwflpzMsyCiYI6pca5jIj6Zh4jsoMwFkUArT55IvfYGFHOcef5oyzfAxq3YwXvGaaWOHS8aa2hVjaf0i')
        ]);
    }
}
