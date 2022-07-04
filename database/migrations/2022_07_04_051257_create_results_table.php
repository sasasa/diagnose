
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateResultsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("results", function (Blueprint $table) {

						$table->increments('id');
                        $table->integer('point')->comment('解答ポイント');
						$table->unsignedBigInteger('user_id')->comment('ユーザーID');
						$table->unsignedBigInteger('result_template_id')->comment('結果ID');
                        $table->timestamps();


						// ----------------------------------------------------
						// -- SELECT [results]--
						// ----------------------------------------------------
						// $query = DB::table("results")
						// ->leftJoin("users","users.id", "=", "results.user_id")
						// ->leftJoin("result_templates","result_templates.id", "=", "results.result_template_id")
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
                Schema::dropIfExists("results");
            }
        }
    