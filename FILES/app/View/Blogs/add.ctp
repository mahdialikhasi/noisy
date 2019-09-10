<?php
$this->Html->addCrumb('دست نوشته ها', '/blogs/', array('class' => 'breadcrumb'));
$this->Html->addCrumb('افزودن دست نوشته', '/blogs/add/', array('class' => 'breadcrumb'));
?>
<h1 class="hide">افزودن دست نوشته</h1>
<div class="row">
    <h2>افزودن دست نوشته</h2>
    <div class="col s12">
        <div class="card">
            <?php 
            echo $this->Html->script('ckeditor/ckeditor');
            echo $this->Form->create('Blog'); 
            ?>
            <div class="card-content black-text">
                <span class="card-title">افزودن دست نوشته</span>
                <?php                               
                echo $this->Form->input('title', array('label' => 'عنوان', 'div' => array('class' => "input-field ".($this->Form->isFieldError('title') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                echo $this->Form->input('description', array('label' => 'خلاصه', 'class' => 'ckeditor', 'div' => array('class' => "input-field ".($this->Form->isFieldError('description') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                echo $this->Form->input('body', array('label' => 'متن کامل', 'class' => 'ckeditor', 'div' => array('class' => "input-field ".($this->Form->isFieldError('body') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                echo $this->Form->input('draft', array('type' => 'checkbox','label' => 'ذخیره به عنوان پیش نویس'));
                echo $this->Form->input('Tag', array('label' => 'برچسب های این دست نوشته', 'type' => 'text', 'div' => array('class' => "input-field tagdiv ".($this->Form->isFieldError('Tag') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
                ?>                              
            </div>
            <div class="card-action">
                <?php
                echo $this->Form->end(array('label' => 'افزودن دست نوشته', 'div' => array('class' => "btn waves-effect submit submitdiv")));
                ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script('jquery-ui.min') ?>
<script type="text/javascript">
    var availableTags =[
        <?php
        foreach($currentTags as $tag){
            echo '"'.$tag.'",';
        }
        ?>
    ];
    function split( val ) {
        return val.split( /،\s*/ );
    }
    function extractLast( term ) {
        return split( term ).pop();
    }
    $( "#TagTag" ).bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
            event.preventDefault();
        }
    }).autocomplete({
        minLength: 0,
        source: function( request, response ) {
        // delegate back to autocomplete, but extract the last term
            response( $.ui.autocomplete.filter(
                availableTags, extractLast( request.term ) ) );
            },
        focus: function() {
            // prevent value inserted on focus
            return false;
        },
        select: function( event, ui ) {
            var terms = split( this.value );
            // remove the current input
            terms.pop();
            // add the selected item
            terms.push( ui.item.value );
            // add placeholder to get the comma-and-space at the end
            terms.push( "" );
            this.value = terms.join( "،" );
            return false;
        }
    });
    $("#ui-id-1").appendTo(".tagdiv");
    CKEDITOR.replace( 'data[Blog][body]' );
    CKEDITOR.replace( 'data[Blog][description]' );
</script>