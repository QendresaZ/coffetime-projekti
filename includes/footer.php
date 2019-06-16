        <!--Footer-->

        <div id="footer">
            <div class="first-footer">
                <h2>Ipsumsenterdum non velit</h2>
                <p>
                    Morbitincidunt maurisque eros molest nunc anteget sed vel lacus
                     mus semper. Anterdumnullam interdum eros dui urna consequam ac 
                     nisl nullam ligula vestassa. <br />
                    <br />
                    Condimentumfelis et amet tellent quisquet a leo lacus nec augue 
                    accumsan. Sagittislaorem dolor ipsum at urna et pharetium malesuada
                     nis consectus odio.<br />
                        <br />
                    Anterdumnullam interdum eros dui urna consequam ac nisl nullam ligula vestassa.
                </p>
                <a href="#">Continue Reading >></a>
            </div>

            <div class="second-footer">
                    <h2>Ipsumsenterdum non velit</h2>
                <p>
                    Morbitincidunt maurisque eros molest nunc anteget sed vel lacus
                    mus semper. Anterdumnullam interdum eros dui urna consequam ac 
                    nisl nullam ligula vestassa. 
                </p>
                <p><span>
                    Cursusorci conseque mauristibulum
                </span>
                </p>
                <p>
                    Condimentumfelis et amet tellent quisquet a leo lacus 
                    nec augue accumsan. Sagittislaorem dolor ipsum at urna
                     et pharetium malesuada nis consectus odio.
                </p>
                <p><span>
                    Cursusorci conseque mauristibulum
                    </span>
                </p>
            </div>

            <div class="third-footer">
                <h2>Ipsumsenterdum non velit</h2>
                <p>
                    Morbitincidunt maurisque eros molest nunc anteget sed 
                    vel lacus mus semper. Anterdumnullam interdum eros dui
                     urna consequam ac nisl nullam ligula vestassa.
                </p>

                <p class="info">Tel: xxxxx xxxxx xxxxx</p>
                <p class="info">Fax: xxxxx xxxxxxxxxx</p>
                <p class="info">Email: me@mydomain.com</p>

                <form>
                <label>Join our mailing list:<br />
                <input type="email" class="email" name="email" placeholder="Enter Email Here " required>
                </label>
                <input type="button" value="Go" class="gobtn"/>
                 </form>
            </div>
        </div>
        <!--End of Footer-->
        <div id="copyright">
            <div class="firstcpr"> 
                <p>
                Company No. xxxxxxx - VAT No. xxxxxxxxx
                </p><br />
                <p>
                Copyright © 2013 - All Rights Reserved - Domain Name
                </p>
            </div>
               
            <div class="secondcpr">
                <p>
                    E-Newsletter | LinkedIn | Twitter | RSS Feed
                </p><br />
                <p>
                    Valid XHTML | Valid CSS | Template by OS Templates
                 </p>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/jquery.bxslider.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
	<script src="js/contact-form-validation.js"></script>
    <script>
            $(document).ready(function(){
                  $('.bxslider').bxSlider();
                });
        </script> 

    <script>
        var mobilebtn = document.querySelector('.mobile-btn');
        var menu = document.querySelector('.menu');
        var closeBtn = document.querySelector('.close');
        var overlay = document.querySelector('.overlay');

        mobilebtn.addEventListener('click', function(){
            menu.className += ' open';
            overlay.className += ' open';
            console.log('click');
        })

        closeBtn.addEventListener('click', function(){
            menu.className = 'menu';
            overlay.className = 'overlay';
        })

        window.addEventListener('click', function(event){
            if(event.target === overlay){
                menu.className = 'menu';
                overlay.className = 'overlay';
            }
        })
    </script>