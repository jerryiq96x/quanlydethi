 <footer class="main-footer">
    <strong>Phát triển bởi:<a href="https://www.facebook.com/tophatrienvachuyengiaocongnghe"><i class="fa fa-heartbeat"></i> Tổ phát triển - Khoa công nghệ thông tin</a></strong>
  </footer>

 
</div>
<!-- ./wrapper -->
<!-- SlimScroll -->
<script>
	$('a').tooltip();
	$('button').tooltip();	
</script>
{if !empty($message)}
    <script type='text/javascript'>
	    $(document).ready(function() {
	        showMessage( "{$message.message}","{$message.type}");
	    });
	</script>
{/if}
</body>
</html>