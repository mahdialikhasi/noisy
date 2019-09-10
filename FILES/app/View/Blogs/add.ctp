<div class="panel panel-default">
    <div class="panel-heading">افزودن دست نوشته</div>
    <div class="panel-body">
        <?php
            echo $this->Html->script('ckeditor/ckeditor');
            echo $this->Form->create('Blog');
            echo $this->Form->input('title', array('label' => 'عنوان', 'placeholder' => 'عنوان', 'class' => 'form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('title') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
            echo $this->Form->input('description', array('label' => 'خلاصه', 'placeholder' => 'خلاصه', 'class' => 'ckeditor form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('description') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
            echo $this->Form->input('body', array('label' => 'متن کامل', 'placeholder' => 'متن کامل', 'class' => 'ckeditor form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('body') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
            echo $this->Form->input('draft', array('type' => 'checkbox','label' => 'ذخیره به عنوان پیش نویس', 'placeholder' => 'ذخیره به عنوان پیش نویس', 'style' => 'float:left;width:50%', 'class' => 'form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('draft') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
            echo $this->Form->input('Tag', array('label' => 'برچسب های این دست نوشته', 'type' => 'text', 'class' => 'form-control', 'div' => array('class' => "form-group ".($this->Form->isFieldError('Tag') ? 'has-error' : '') ), 'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))));
        ?>
    </div>
    <div class="panel-footer">
        <?php
        echo $this->Form->end(array('label' => 'ارسال دست نوشته', 'class' => 'btn btn-primary'));
        ?>
    </div>
</div>
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
</script>