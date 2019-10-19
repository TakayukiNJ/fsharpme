@extends('layouts.app')

@section('content')


<!-- このページは2月以降に作成 -->

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chats</div>

                <div class="panel-body">
                    <chat-messages :messages="messages"></chat-messages>
                </div>
                <div class="panel-footer">
                    <chat-form
                        v-on:messagesent="addMessage"
                        :user="{{ Auth::user()->name }}"
                    ></chat-form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
  .chat {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .chat li {
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
  }

  .chat li .chat-body p {
    margin: 0;
    color: #777777;
  }

  .panel-body {
    overflow-y: scroll;
    height: 350px;
  }

  ::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
  }
</style>

<!--<div class="container">-->
   
<!--    <div class="row">-->
       
<!--        <div class="col-md-8 col-md-offset-2">-->
            
<!--            チャット画面！！！！！！！！-->
            
<!--            <br>-->
<!--            <br>-->
  			    
<!--            <div id="chat">-->
<!--                <textarea v-model="message"></textarea>-->
<!--                <br>-->
<!--                <button type="button">送信</button>-->
<!--            </div>-->
<!--            <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>-->
<!--            <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>-->
<!--            <script>-->
        
<!--                new Vue({-->
<!--                    el: '#chat',-->
<!--                    data: {-->
<!--                        message: ''-->
<!--                    }-->
<!--                });-->
        
<!--            </script>-->
  			    
  			    
  			    
  			    
  			    
  			    
            <!-- 目標 -->
<!--            <div class="panel panel-default">-->
<!--                <div class="panel-heading">-->
<!--                    hi!-->
<!--                </div>-->
<!--                <div class="panel-body">-->
<!--                    こんにちは。-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
@endsection
