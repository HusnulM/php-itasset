<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<div class="footer">
  <div class="footer-inner">
    <div class="footer-content">
      <span class="bigger-120">
        <span class="blue bolder">ToekangKetik | IT Asset</span>
        Application &copy; 2019
      </span>

      &nbsp; &nbsp;
      <span class="action-buttons">
        <a href="#">
          <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
        </a>

        <a href="#">
          <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
        </a>

        <a href="#">
          <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
        </a>
      </span>
    </div>
  </div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
  <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div>
<script src="<?= BASEURL; ?>/assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
  if('ontouchstart' in document.documentElement) document.write("<script src='<?= BASEURL; ?>/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="<?= BASEURL; ?>/assets/js/bootstrap.min.js"></script>
<script src="<?= BASEURL; ?>/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= BASEURL; ?>/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?= BASEURL; ?>/assets/js/dataTables.buttons.min.js"></script>

<script src="<?= BASEURL; ?>/assets/js/jquery-ui.custom.min.js"></script>
<script src="<?= BASEURL; ?>/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?= BASEURL; ?>/assets/js/jquery.sparkline.index.min.js"></script>
<script src="<?= BASEURL; ?>/assets/js/jquery.flot.min.js"></script>
<script src="<?= BASEURL; ?>/assets/js/jquery.flot.pie.min.js"></script>
<script src="<?= BASEURL; ?>/assets/js/jquery.flot.resize.min.js"></script>
<script src="<?= BASEURL; ?>/assets/js/ace-elements.min.js"></script>
<script src="<?= BASEURL; ?>/assets/js/ace.min.js"></script>

<script src="<?= BASEURL; ?>/assets/js/jquery.jqGrid.min.js"></script>
<script src="<?= BASEURL; ?>/assets/js/grid.locale-en.js"></script>

<script src="<?= BASEURL; ?>/js/script.js"></script>



<script type="text/javascript">
  jQuery(function($) {
    var myTable = $('#dynamic-table').DataTable( {
      bAutoWidth: false,
      "aoColumns": [
      { "bSortable": false },
      null, null,null, 
      { "bSortable": false }
      ],
      "aaSorting": [],      

      select: {
        style: 'multi'
      }
    } );      


    $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

    new $.fn.dataTable.Buttons( myTable, {
      buttons: [
      {
        "extend": "colvis",
        "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
        "className": "btn btn-white btn-primary btn-bold",
        columns: ':not(:first):not(:last)'
      },
      {
        "extend": "copy",
        "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
        "className": "btn btn-white btn-primary btn-bold"
      },
      {
        "extend": "csv",
        "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
        "className": "btn btn-white btn-primary btn-bold"
      },
      {
        "extend": "excel",
        "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
        "className": "btn btn-white btn-primary btn-bold"
      },
      {
        "extend": "pdf",
        "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
        "className": "btn btn-white btn-primary btn-bold"
      },
      {
        "extend": "print",
        "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
        "className": "btn btn-white btn-primary btn-bold",
        autoPrint: false,
        message: 'This print was produced using the Print button for DataTables'
      }     
      ]
    } );
    
    myTable.buttons().container().appendTo( $('.tableTools-container') );

    var defaultCopyAction = myTable.button(1).action();
    myTable.button(1).action(function (e, dt, button, config) {
      defaultCopyAction(e, dt, button, config);
      $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
    });


    var defaultColvisAction = myTable.button(0).action();
    myTable.button(0).action(function (e, dt, button, config) {

      defaultColvisAction(e, dt, button, config);


      if($('.dt-button-collection > .dropdown-menu').length == 0) {
        $('.dt-button-collection')
        .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
        .find('a').attr('href', '#').wrap("<li />")
      }
      $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
    });

    setTimeout(function() {
      $($('.tableTools-container')).find('a.dt-button').each(function() {
        var div = $(this).find(' > div').first();
        if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
        else $(this).tooltip({container: 'body', title: $(this).text()});
      });
    }, 500);  

    myTable.on( 'select', function ( e, dt, type, index ) {
      if ( type === 'row' ) {
        $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
      }
    } );
    myTable.on( 'deselect', function ( e, dt, type, index ) {
      if ( type === 'row' ) {
        $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
      }
    } );

    $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

    $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
      var th_checked = this.checked;

      $('#dynamic-table').find('tbody > tr').each(function(){
        var row = this;
        if(th_checked) myTable.row(row).select();
        else  myTable.row(row).deselect();
      });
    });

    $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
      var row = $(this).closest('tr').get(0);
      if(this.checked) myTable.row(row).deselect();
      else myTable.row(row).select();
    });


    $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
      e.stopImmediatePropagation();
      e.stopPropagation();
      e.preventDefault();
    });
  })
</script>
</body>
</html>