<?php /* Smarty version 3.1.24, created on 2015-07-15 13:13:52
         compiled from "admin/design/html/groups.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:749955a5cff0db7a97_33307904%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f859ecbcfc513fa2f989ad937c6e4eee9ac3f6d9' => 
    array (
      0 => 'admin/design/html/groups.tpl',
      1 => 1436816811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '749955a5cff0db7a97_33307904',
  'variables' => 
  array (
    'groups' => 0,
    'group' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55a5cff0e11824_31272299',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a5cff0e11824_31272299')) {
function content_55a5cff0e11824_31272299 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '749955a5cff0db7a97_33307904';
?>

<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_Variable('Группы пользователей', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>


<div class="capture_head">
    <div id="header">
        <h1>Группы пользователей</h1>
    </div>

    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'GroupAdmin'),$_smarty_tpl);?>
">+ Добавить группу</a>
</div>


<!-- Основная часть -->
<?php if ($_smarty_tpl->tpl_vars['groups']->value) {?>
	<form id="list_form" method="post">
        <input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
        <div id="list">

            <div class="list_top">
                <div class="checkbox"></div>
                <div class="name">Название группы</div>
                <div class="date">Скидка</div>
            </div>

            <?php
$_from = $_smarty_tpl->tpl_vars['groups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['group']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$foreach_group_Sav = $_smarty_tpl->tpl_vars['group'];
?>
            <div class="row">
                <div class="checkbox cell">
                    <input type="checkbox" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['group']->value->id;?>
"/>
                </div>
                <div class="name cell">
                    <a href="index.php?module=GroupAdmin&id=<?php echo $_smarty_tpl->tpl_vars['group']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value->name;?>
</a>
                </div>
                <div class="date cell">
                    <?php echo $_smarty_tpl->tpl_vars['group']->value->discount;?>
 %
                </div>
                <div class="icons cell">
                    <a class="delete" title="Удалить" href="#"></a>
                </div>
            </div>
            <?php
$_smarty_tpl->tpl_vars['group'] = $foreach_group_Sav;
}
?>
        </div>

        <div id="action">
            <label id="check_all" class="dash_link">Выбрать все</label>

            <span id=select>
            <select name="action">
                <option value="delete">Удалить</option>
            </select>
            </span>

            <input id="apply_action" class="button_green" type="submit" value="Применить">
        </div>
	</form>
<?php }?>



<?php echo '<script'; ?>
>
$(function() {
	
	// Выделить все
	$("#check_all").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', 1-$('#list input[type="checkbox"][name*="check"]').attr('checked'));
	});	

	// Удалить 
	$("a.delete").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', false);
		$(this).closest(".row").find('input[type="checkbox"][name*="check"]').attr('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=delete]').attr('selected', true);
		$(this).closest("form").submit();
	});
		
	// Подтверждение удаления
	$("form").submit(function() {
		if($('#list input[type="checkbox"][name*="check"]:checked').length>0)
			if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
				return false;	
	});
	
});

<?php echo '</script'; ?>
>
<?php }
}
?>