<h6 class="font-weight-bold mb-3 text-center text-lg-left">Member</h6>
        <div class="white z-depth-1 px-3 pt-3 pb-0">
          <ul class="list-unstyled friend-list">
            <?php 
                if(!isset($con)){
                    require('./../../../con_db.php');
                }
                if(!isset($_SESSION)){
                    session_start();
                }
                $sql="select admin.username,admin.name from admin where username !=\"".$_SESSION['username_admin']."\"";//không hiển thị admin dang đăng nhập trong list
                $result=mysqli_query($con,$sql);
                $text='';
                while($row=mysqli_fetch_object($result)){
                $text.='<li class="p-2">
                            <a href="#" class="d-flex justify-content-between" onclick="member_choose(\''.$row->username.'\')">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                            <div class="text-small">
                                <strong>'.$row->name.'</strong>
                                <p class="last-message text-muted">Nội dung mới gửi nha.</p>
                            </div>
                            <div class="chat-footer">
                                <p class="text-smaller text-muted mb-0">5 min ago</p>
                                <span class="text-muted float-right"><i class="fas fa-mail-reply" aria-hidden="true"></i></span>
                            </div>
                            </a>
                        </li>';
                }
               echo $text;

            ?>
          </ul>
        </div>
        <script>
            function member_choose(username_member){
                $.ajax({
                    url:'./src_admin/xuly/chat_box/choose_member.php',
                    type:'post',
                    dataType:'html',
                    data:{
                        choose_admin:username_member
                    }
                    }).fail(function(){
                        alert("Yêu cầu thất bại");
                    }).done(function(data){
                        show_message();//khi nhấp vào admin nào thì hiện tin nhắn với admin đó lên
                    })
                
            }
        </script>