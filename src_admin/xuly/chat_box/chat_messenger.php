        <div class="chat-message">
        <ul class="list-unstyled chat">

           
            <?php 
                if(!isset($con)){
                    require('./../../../con_db.php');
                }
                if(!isset($_SESSION)){
                    session_start();
                }
                if(isset($_SESSION['choose_admin'])){
                    $sql="select * from admin_chat where (admin_gui =\"".$_SESSION['username_admin']."\" and admin_nhan=\"".$_SESSION['choose_admin']."\" ) or (admin_gui =\"".$_SESSION['choose_admin']."\" and admin_nhan=\"".$_SESSION['username_admin']."\" )  order by admin_chat.create_at asc";
                    $result=mysqli_query($con,$sql);
                    $count_row=0;
                    $count_row=mysqli_num_rows($result);
                    if($count_row==0){
                        echo '<li class="d-flex justify-content-between mb-4">
                                    <div class="chat-body white p-3 ml-2 z-depth-1">
                                    <div class="header">
                                        <strong class="primary-font">Thông Báo</strong>
                                        <small class="pull-right text-muted"><i class="far fa-clock"></i></small>
                                    </div>
                                    <hr class="w-100">
                                    <p class="mb-0">
                                    Text this person
                                    </p>
                                    </div>
                                </li>';
                    }
                    if($count_row<4){
                        $count_row=4;
                    }
                    $sql="select * from admin_chat where (admin_gui =\"".$_SESSION['username_admin']."\" and admin_nhan=\"".$_SESSION['choose_admin']."\" ) or (admin_gui =\"".$_SESSION['choose_admin']."\" and admin_nhan=\"".$_SESSION['username_admin']."\" )  order by admin_chat.create_at asc limit ".($count_row-4).",4";
                    $result=mysqli_query($con,$sql);
                    $text='';
                    while($row=mysqli_fetch_object($result)){
                        if($row->admin_nhan==$_SESSION['username_admin']){//nếu nick đang đăng nhập đc nhận content..

                            $text.=' <li class="d-flex justify-content-between mb-4">
                                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" alt="avatar" class="avatar rounded-circle mr-2 ml-0 z-depth-1">
                                            <div class="chat-body white p-3 ml-2 z-depth-1">
                                            <div class="header">
                                                <strong class="primary-font">'.$row->admin_gui.'</strong>
                                                <small class="pull-right text-muted"><i class="far fa-clock"></i>'.$row->create_at.'</small>
                                            </div>
                                            <hr class="w-100">
                                            <p class="mb-0">
                                            '.$row->content.'
                                            </p>
                                            </div>
                                        </li>';
                        }
                        if($row->admin_gui==$_SESSION['username_admin']){
                            $text.='  <li class="d-flex justify-content-between mb-4">
                                            <div class="chat-body white p-3 z-depth-1">
                                            <div class="header">
                                                <strong class="primary-font">'.$row->admin_gui.'</strong>
                                                <small class="pull-right text-muted"><i class="far fa-clock"></i>'.$row->create_at.'</small>
                                            </div>
                                            <hr class="w-100">
                                            <p class="mb-0">
                                            '.$row->content.'
                                            </p>
                                            </div>
                                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="avatar" class="avatar rounded-circle mr-0 ml-3 z-depth-1">
                                        </li>
                                        ';
                        }
                
                    }
                echo $text;
             }
            ?>
          </ul>

        </div>
      

        <script>
            function send_data(){
                var data=$('#data_send').val();
                if(data===''){
                    return;
                }
                $.ajax({
                    url:'./src_admin/xuly/chat_box/Add_messenger.php',
                    type:'POST',
                    dataType:'html',
                    data:{
                        data:data
                    }
                }).fail(function(){
                    alert("Không thể gửi tin nhắn.");
                }).done(function(data){
                    show_message();
                })
                document.getElementById('data_send').value='';
               
            }
            function show_message(){//mỗi lần nhấp nút send thì show tin nhắn mới gửi lên (show lại data)
                $.ajax({
                    url:'./src_admin/xuly/chat_box/chat_messenger.php',
                    type:'POST',
                    dataType:'html',
                    data:{  
                    }
                }).fail(function(){
                    alert("Không thể show tin nhắn.");
                }).done(function(data){
                    $('#area_show_chat_messenger').html(data);

                })
            }
          
        </script>