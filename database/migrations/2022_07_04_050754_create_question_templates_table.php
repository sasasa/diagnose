
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateQuestionTemplatesTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("question_templates", function (Blueprint $table) {

						$table->increments('id');
						$table->text('content')->comment('設問内容');
                        $table->timestamps();


						// ----------------------------------------------------
						// -- SELECT [question_templates]--
						// ----------------------------------------------------
						// $query = DB::table("question_templates")
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
                Schema::dropIfExists("question_templates");
            }
        }
    