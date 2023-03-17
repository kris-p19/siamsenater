<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacebookMessagePluginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_message_plugins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });

        DB::table('facebook_message_plugins')->insert([
            [ 
                'content' => html_entity_decode('<!-- Messenger ปลั๊กอินแชท Code --> <div id="fb-root"></div> <!-- Your ปลั๊กอินแชท code --> <div id="fb-customer-chat" class="fb-customerchat"> </div> <script> var chatbox = document.getElementById("fb-customer-chat"); chatbox.setAttribute("page_id", "108489842143032"); chatbox.setAttribute("attribution", "biz_inbox"); </script> <!-- Your SDK code --> <script> window.fbAsyncInit = function() { FB.init({ xfbml : true, version : "v16.0" }); }; (function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js"; fjs.parentNode.insertBefore(js, fjs); }(document, "script", "facebook-jssdk"));</script>'),
                'status' => 'inactive',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facebook_message_plugins');
    }
}
