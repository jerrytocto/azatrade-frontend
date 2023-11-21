<!--   Core JS Files   -->
<script src="../js/core/jquery.min.js"></script>
<script src="../js/core/popper.min.js"></script>
<script src="../js/bootstrap-material-design.min.js"></script>
<script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="../js/plugins/moment.min.js"></script>
<script src="../js/plugins/bootstrap-datetimepicker.min.js"></script>
<script src="../js/plugins/nouislider.min.js"></script>
<script src="../js/plugins/bootstrap-selectpicker.js"></script>
<script src="../js/plugins/bootstrap-tagsinput.js"></script>
<script src="../js/plugins/jasny-bootstrap.min.js"></script>
<script src="../js/modernizr.js"></script>
<script src="../js/material-dashboard.js?v=2.0.1"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script src="../js/plugins/arrive.min.js" type="text/javascript"></script>
<script src="../js/plugins/jquery.validate.min.js"></script>
<script src="../js/plugins/chartist.min.js"></script>
<script src="../js/plugins/jquery.bootstrap-wizard.js"></script>
<script src="../js/plugins/bootstrap-notify.js"></script>
<script src="../js/plugins/jquery-jvectormap.js"></script>
<script src="../js/plugins/nouislider.min.js"></script>
<script src="../js/plugins/jquery.select-bootstrap.js"></script>
<script src="../js/plugins/jquery.datatables.js"></script>
<script src="../js/plugins/sweetalert2.js"></script>
<script src="../js/plugins/jasny-bootstrap.min.js"></script>
<script src="../js/plugins/fullcalendar.min.js"></script>
<script src="../js/plugins/demo.js?v2019"></script>

  <!--<script type="text/javascript">
$(document).ready(function() {
    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }

    });


    var table = $('#datatables').DataTable();

    // Edit record
    table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');

        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    });

    // Delete a record
    table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
    });

    //Like record
    table.on('click', '.like', function() {
        alert('You clicked on Like button');
    });

    $('.card .material-datatables label').addClass('form-group');
});

</script>-->

<!-- Sharrre libray -->
<script src="../js/jquery.sharrre.js">

</script>

<script>
$(document).ready(function(){
    $('#twitter').sharrre({
      share: {
        twitter: true
      },
      enableHover: false,
      enableTracking: false,
      enableCounter: false,
      buttons: { twitter: {via: 'Azatrade'}},
      click: function(api, options){
        api.simulateClick();
        api.openPopup('twitter');
      },
      template: '<i class="fa fa-twitter"></i> Twitter',
      url: 'https://www.azatrade.info/'
    });

    $('#facebook').sharrre({
      share: {
        facebook: true
      },
      enableHover: false,
      enableTracking: false,
      enableCounter: false,
      click: function(api, options){
        api.simulateClick();
        api.openPopup('facebook');
      },
      template: '<i class="fa fa-facebook-square"></i> Facebook',
      url: 'https://www.azatrade.info/'
    });

    $('#google').sharrre({
      share: {
        googlePlus: true
      },
      enableCounter: false,
      enableHover: false,
      enableTracking: true,
      click: function(api, options){
        api.simulateClick();
        api.openPopup('googlePlus');
      },
      template: '<i class="fa fa-google-plus"></i> Google',
      url: 'https://www.azatrade.info/'
    });
	
});


var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-77705955-1']);
_gaq.push(['_trackPageview']);

(function() {
    var ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
})();

// Facebook Pixel Code Don't Delete
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

try{
	fbq('init', '208373292586713');
	fbq('track', "PageView");

}catch(err) {
	console.log('Facebook Track Error:', err);
}

</script>

<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=208373292586713&ev=PageView&noscript=1"
/></noscript>


<!--Start of Zopim Live Chat Script-->
<!--<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?3ltUSTPj9IX2rsG0WpgXaKAntZS4WYye";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>-->
<!--End of Zopim Live Chat Script--> 


<style>
/*chat facebook*/
.chat-conteiner{margin:0;padding:0;width:100%;max-width:260px;height:auto;position:fixed;bottom:0;right:15px;z-index:9999;}
.chat-buttom{width:100%;margin:0;cursor:pointer;user-select:none;padding:7px 0;background-color:#1A50BC;text-align:center;color:white;border-radius:5px;}
.chat-content{margin:0;padding:0;background-color:#fff;display:none;}
</style>

<!--<div class="visible-lg visible-md">-->
<section class="chat-conteiner">
      <div class="chat-buttom">Chatea Con Nosotros <img src="../img/chat-logo.png" width="32px" /></div>
      <div class="chat-content">
      <!--<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fwww.augeperu.org%25C3%25BA-Webs-243790482299542%2F&tabs=messages&width=260&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>-->
      <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fwww.azatrade.info%25C3%25BA-Webs-208373292586713%2F&tabs=messages&width=260&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
      </div>
    </section>
    <!--</div>-->
    
   <script>
	$(".chat-buttom").on('click', function(e){
    e.preventDefault();
    $(".chat-content").slideToggle('fast');
  });
	</script>
	
	<!-- div del chat messenger flotante -->