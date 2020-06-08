<!-- Breadcrumbs-->
<ol class="breadcrumb">
<?php foreach ($this->uri->segments as $segment): ?>
	<?php 
		$url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
		$is_active =  $url == $this->uri->uri_string;
	?>


	<li class="breadcrumb-item">		
		<?php echo ucfirst($segment) ?>
	</li>
<?php endforeach; ?>
</ol>
