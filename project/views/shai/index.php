<input type="button" value="添加晒单信息">
<table id="sample-table-1" class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th class="center">
            <label>
                <input type="checkbox" class="ace" />
                <span class="lbl"></span>
            </label>
        </th>
        <th>晒单ID</th>
        <th>晒单标题</th>
        <th class="hidden-480">商品名称</th>

        <th>
            <i class="icon-time bigger-110 hidden-480"></i>
            晒单图片
        </th>
        <th class="hidden-480">晒单内容</th>

        <th></th>
    </tr>
    </thead>

    <tbody>
    <?php foreach($arr as $k=>$v){?>
    <tr>
        <td class="center">
            <label>
                <input type="checkbox" class="ace" />
                <span class="lbl"></span>
            </label>
        </td>

        <td>
            <a href="#"><?php echo $v['sd_id']?></a>
        </td>
        <td><?php echo $v['sd_title']?></td>
        <td class="hidden-480"><?php echo $v['dd'][0]['g_name']?></td>
        <td><?php foreach($v['cc'] as $kk=>$vv){?>
            <img src="./img/<?php echo $vv['sd2_img']?>" width="100px" height="100px">
        <?php }?>
        </td>

        <td class="hidden-480">
            <span class="label label-sm label-warning">
                <?php
                $content=$v['sd_content'];
                $content=substr($content,0,45);

                ?>
                <span id='baqi-<?php echo $v['sd_id']?>'><?php echo $content?></span>

<!--                <span class="xiang"  value="--><?php //echo $v['sd_id']?><!--">详情</span>-->

                <!--a.parent().children("span").first().html(t);-->
                <a href="javascript:void(0)" class="xiang" id="show" value="<?php echo $v['sd_id'] ?>" style="margin-left: 10px;color: #FFF;">详情</a>
            </span>
        </td>

        <td>
            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                <button class="btn btn-xs btn-success">
                    <i class="icon-ok bigger-120"></i>
                </button>

                <button class="btn btn-xs btn-info">
                    <i class="icon-edit bigger-120"></i>
                </button>

                <button class="btn btn-xs btn-danger">
                    <i class="icon-trash bigger-120"></i>
                </button>

                <button class="btn btn-xs btn-warning">
                    <i class="icon-flag bigger-120"></i>
                </button>
            </div>

            <div class="visible-xs visible-sm hidden-md hidden-lg">
                <div class="inline position-relative">
                    <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-cog icon-only bigger-110"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                        <li>
                            <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </td>
    </tr>
    <?php }?>
    </tbody>
</table>
<script src="./js/jquery.1.8.min.js"></script>
<script>
//    $(".xiang").click(function(){
//        onmouseover="this.style.cursor='hand'";
//        var id=$(this).attr("value");
//        $.post('index.php?r=shai/more',{
//            'id':id
//        },function(txt){
//                $("#baqi-"+id).html(txt);
//                $(".xiang").html(' ');
//        })
//    })
$(document).on("click",".xiang",function(){
        var a=$(this);
        var id = a.attr("value");
        var str = '';
        $.ajax({
            url: "index.php?r=shai/more",
            type: "post",
            data: "id=" + id,
            dataType: "json",
            success: function (op) {
                str += "<a href='javascript:void(0)' class='xiang' id='show'  style='margin-left: 10px;color: #FFF;'>" + op + "</a>";
                a.parent().children("span").first().html(str);
                a.html("收起");
                a.attr("class", "quxiao");
            }
        })
        });

$(document).on("click",".quxiao",function(){
    var a=$(this);
    var test= a.parent().children("span").first().children().html();
    var t=test.substr(0,7);
    a.parent().children("span").first().html(t);
    a.html("详情");
    a.attr("class","xiang");

});
</script>