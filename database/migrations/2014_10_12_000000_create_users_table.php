    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('users')) {

        Schema::create('users', function (Blueprint $table) {

            $table->integer('id')->autoIncrement();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email',191);
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->bigInteger('phone');

            $table->date('dob');
           
            $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();

            $table->softDeletes();
            $table->timestamps();
            
        });
    }
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
