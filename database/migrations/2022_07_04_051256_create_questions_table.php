
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateQuestionsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("questions", function (Blueprint $table) {

						$table->increments('id');
						$table->unsignedBigInteger('question_template_id')->comment('質問内容ID');
						$table->integer('point')->comment('解答ポイント');
						$table->unsignedBigInteger('user_id')->comment('ユーザーID');
                        $table->timestamps();

						// ----------------------------------------------------
						// -- SELECT [questions]--
						// ----------------------------------------------------
						// $query = DB::table("questions")
						// ->leftJoin("question_templates","question_templates.id", "=", "questions.question_template_id")
						// ->leftJoin("users","users.id", "=", "questions.user_id")
						// ->get();
						// dd($query); //For checking



                });
            }

            /**
             * Reverse the migrations.
             *
             * @return void
             */
            public function down()
            {
                Schema::dropIfExists("questions");
            }
        }
    