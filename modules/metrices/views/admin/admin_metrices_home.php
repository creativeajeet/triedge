
	<style>
	/* 
	Generic Styling, for Desktops/Laptops 
	*/
	table { 
		width: 100%; 
		border-collapse: collapse; 
	}
	/* Zebra striping */
	tr:nth-of-type(odd) { 
		background: #eee; 
		
	}
	th { 
		background: #333; 
		color: white; 
		font-weight: bold; 
	}
	tr, td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
		
	}

	</style>


<h2>Metrices Entry</h2>
<table width="100%">
  <tr>
    <td><?php echo anchor('metrices/admin/dailyHours','Daily In-Out Entry'); ?></td>
  </tr>
  <tr>
    <td><?php echo anchor('metrices/admin/settings','Excess Leaves Settings'); ?></td>
    
  </tr>
  <tr>
    <td><?php echo anchor('metrices/admin/calldata','Call data'); ?></td>
  </tr>
   <tr>
    <td><?php echo anchor('metrices/admin/holidays','Holidays'); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<h2>Old Data Entry</h2>
<table width="100%">
  <tr>
    <td><?php echo anchor('metrices/admin/oldLeaves','Leaves Taken'); ?></td>
  </tr>
  <tr>
    <td><?php echo anchor('metrices/admin/oldWorkHour','Working Hours'); ?></td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

