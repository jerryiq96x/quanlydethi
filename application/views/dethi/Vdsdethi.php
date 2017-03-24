<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Danh sách đề thi
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Quản lý đề thi</li>
        <li>Đề thi</li>
        <li class="active">Danh sách đề thi</li>
      </ol>
    </section>

    <section class="content">
    	<div class="box">
    		<div class="box-body">
    			<div class="row">
    				<div class="col-sm-12" style="margin-bottom: 10px;">
    					<a href="{$url}dethi" class="btn btn-flat btn-primary"><span class="glyphicon glyphicon-plus"></span> Thêm đề thi</a>
    				</div><br>
    				<div class="col-sm-12">
    					<table class="table example table-bordered table-hover table-striped dataTable">
    						<thead>
    							<tr>
    								<td>STT</td>
    								<td>Mã Đề</td>
    								<td>Ngày tạo</td>
                                    <td>Hệ đào tạo</td>
                                    <td>Ngành</td>
    								<td>Môn học</td>
    								<td>Trạng thái</td>
    								<td>Tác vụ</td>
    							</tr>
    						</thead>
    						<tbody>
    						{$i=1}
    						{foreach $listDethi as $l}
    							<tr>
    								<td>{$i++}</td>
    								<td>{$l.PK_sMaDT}</td>
    								<td>{{date("d/m/Y",$l.sThoiGian)}}</td>
                                    <td>
                                        {foreach $listHe as $he}
                                            {if $he.PK_iMaHe == $l.FK_iMaHe}
                                                {$he.sTenHe}
                                            {/if}
                                        {/foreach}
                                    </td>
                                    <td>
                                        {foreach $listNganh as $nganh}
                                            {if $nganh.PK_iMaNganh == $l.FK_iMaNganh}
                                                {$nganh.sTenNganh}
                                            {/if}
                                        {/foreach}
                                    </td>
    								<td>
    									{foreach $listMon as $mon}
    										{if $mon.PK_iMaMon == $l.FK_iMaMon}
    											{$mon.sTenMon}
    										{/if}
    									{/foreach}
    								</td>
    								<td style="text-align: center;">
    								{foreach $listTT as $tt}
    										{if $tt.PK_iMaTT == $l.FK_iMaTT}
    											{if $l.PK_iMaTT =="1"}
    												<label class="label label-success" style="font-size: 1.0em;">{$tt.sTenTT}
    												</label>
    											{else}
    												{if $l.PK_iMaTT =="2"}
    												<label class="label label-warning" data-toggle="tooltip" title="Đã sử dụng: {$l.sNgaySuDung}" style="font-size: 1.0em;">{$tt.sTenTT}
    												</label>
                                                    {else}
                                                        {if $l.PK_iMaTT =="3"}
                                                            <label class="label label-danger" style="font-size: 1.0em;">{$tt.sTenTT}
                                                            </label>
                                                        {else}
                                                            <label class="label label-danger" data-toggle="tooltip" title="Đã sử dụng: {$l.sNgaySuDung}" style="font-size: 1.0em;">{$tt.sTenTT}
                                                            </label>
                                                        {/if}
                                                    {/if}
    											{/if}
    										{/if}
    									{/foreach}

    								</td>
    								<td style="text-align: center;">
                                        
    									<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" autocomplete="off">
                                        {if $l.PK_iMaTT == "1"}
    										<a class="btn btn-xs btn-success" data-toggle="tooltip" data-original-title="Sửa" href="{$url}dethi?id={$l.PK_sMaDT}"><i class="fa fa-edit"></i></a>
                                        {/if}
                                        {if ($l.PK_iMaTT == "1") || ($l.PK_iMaTT == "2")}
                                            <button type="submit" name="{if $l.PK_iMaTT == "1"}huydechuadung{else}{if $l.PK_iMaTT == "2"}huydedadung{/if}{/if}" data-toggle="tooltip" data-original-title="{if $l.PK_iMaTT == "1"}Hủy đề chưa dùng{else}{if $l.PK_iMaTT == "2"}Hủy đề đã dùng{/if}{/if}" value="{$l.PK_sMaDT}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
                                        {else}
                                            <button type="submit" name="{if $l.PK_iMaTT == "3"}recoverchuadung{else}{if $l.PK_iMaTT == "4"}recoverdadung{/if}{/if}" data-toggle="tooltip" data-original-title="{if $l.PK_iMaTT == "3"}Khôi phục đề chưa dùng{else}{if $l.PK_iMaTT == "4"}Khôi phục đề đã dùng{/if}{/if}" value="{$l.PK_sMaDT}" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-refresh"></span></button>
                                        {/if}

    									</form>
                                    
    								</td>
    							</tr>
    						{/foreach}
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
</div>