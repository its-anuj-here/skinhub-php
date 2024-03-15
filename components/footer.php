<?php
    
    //footer
    echo '
    <footer>
        <div class="foot">
          <div class="foot2">
            <div class="text">
              Hey!  '.$_SESSION['user'].'
              <br>
              Message Us<br></div>
              <form action="user_message.php" method="post">
                  <div class="fields">
                      <div class="field name">
                          <input type="text" name="mname" placeholder="Full Name" required>
                        </div>
                <div class="field email">
                  <input type="email" name="memail" placeholder="Personal Email" required>
                    </div>
              </div>
              <div class="field">
                  <input type="text" name="msubject" placeholder="Subject" required>
                    </div>
                      <div class="field">
                         <input type="text" name="mmessage" placeholder="Message" required>
                       </div>
                     <button type="submit" name="send">Send message</button>
              </form>
              </div>
          </div>
          <div class="foot3">
            <h1>Social links</h1>
            <ul class="link">
              <li><a><ion-icon name="logo-facebook"></ion-icon></a></li>
              <li><a><ion-icon name="logo-instagram"></ion-icon></a></li>
              <li><a><ion-icon name="logo-linkedin"></ion-icon></a></li>
              <li><a><ion-icon name="logo-github"></ion-icon></a></li>
            </ul>
          </div>
        </div>
  
        <span>Created By <a href="#"><abbr title="manish205770@keshav.edu.du.ac.in">Manish Bisht</abbr></a>
            <a href="#"><abbr title="chinmay205765@keshav.edu.du.ac.in">Chinmay</abbr></a>
            <a href="#"><abbr title="manjeet205722@keshav.edu.du.ac.in">Manjeet</abbr></a>
            <a href="#"><abbr title="anuj205703@keshav.edu.du.ac.in">Anuj</abbr></a>
            |<span></span> 2021 All rights reserved.
            <br><br>
            Credit of all images available in website goes to their respective owners...
        </span>
    </footer>
    ';
?>