<?php

    echo '
    <div class="slideshow">
        <div class="prev-btn">
            <i class="fas fa-caret-left" id = "prevbutton" onclick="control(-1)"></i>
        </div>
        <div class="images">
            <img src="./images/sideshowimgs/1.jpg" alt="slideshow-image"  class="image">
            <img src="./images/sideshowimgs/2.jpg" alt="slideshow-image"  class="image">
            <img src="./images/sideshowimgs/3.jpg" alt="slideshow-image"  class="image">
            <img src="./images/sideshowimgs/4.jpg" alt="slideshow-image"  class="image">
            <img src="./images/sideshowimgs/6.jpg" alt="slideshow-image"  class="image">
        </div>
        <div class="next-btn">
            <i class="fas fa-caret-right" id = "nextbutton" onclick="control(1)"></i>
        </div>
    </div>
    <script src="slideShow.js"></script>
    ';

?>