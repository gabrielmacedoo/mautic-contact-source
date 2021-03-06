<?php

/*
 * @copyright   2018 Mautic Contributors. All rights reserved
 * @author      Mautic, Inc
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
?>

<!-- filter form -->
<form method="post" action="<?php echo $view['router']->path(
    'mautic_contactsource_timeline_action',
    ['contactSourceId' => $contactSource->getId()]
); ?>" class="panel" id="timeline-filters">
    <div class="form-control-icon pa-xs">
        <input type="text" class="form-control bdr-w-0" name="search" id="search"
               placeholder="<?php echo $view['translator']->trans('mautic.core.search.placeholder'); ?>"
               value="<?php echo $events['filters']['search']; ?>">
        <span class="the-icon fa fa-search text-muted mt-xs"></span>
    </div>
    <?php if (isset($events['types']) && is_array($events['types'])) : ?>
        <div class="history-search panel-footer text-muted">
            <div class="col-sm-5">
                <select name="includeEvents[]" multiple="multiple" class="form-control bdr-w-0"
                        data-placeholder="<?php echo $view['translator']->trans(
                            'mautic.contactsource.events.filter.include.placeholder'
                        ); ?>">
                    <?php foreach ($events['types'] as $typeKey => $typeName) : ?>
                        <option value="<?php echo $typeKey; ?>"<?php echo isset($events['filters']['includeEvents']) && in_array(
                            $typeKey,
                            $events['filters']['includeEvents']
                        ) ? ' selected' : ''; ?> >
                            <?php echo $typeName; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-sm-5">
                <select name="excludeEvents[]" multiple="multiple" class="form-control bdr-w-0"
                        data-placeholder="<?php echo $view['translator']->trans(
                            'mautic.contactsource.events.filter.exclude.placeholder'
                        ); ?>">
                    <?php foreach ($events['types'] as $typeKey => $typeName) : ?>
                        <option value="<?php echo $typeKey; ?>"<?php echo isset($events['filters']['excludeEvents']) && in_array(
                            $typeKey,
                            $events['filters']['excludeEvents']
                        ) ? ' selected' : ''; ?> >
                            <?php echo $typeName; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php /* @todo - export action. Doesn't yet have a router/controller config.
             * <div class="col-sm-2">
             * <a class="btn btn-default btn-block" href="<?php echo $view['router']->generate('mautic_contactsource_timeline_export_action', ['contactSourceId' => $contactSource->getId()]); ?>" data-toggle="download">
             * <span>
             * <i class="fa fa-download"></i> <span class="hidden-xs hidden-sm"><?php echo $view['translator']->trans('mautic.core.export'); ?></span>
             * </span>
             * </a>
             * </div>*/ ?>
        </div>
    <?php endif; ?>

    <input type="hidden" name="leadId" id="leadId" value="<?php echo $contactSource->getId(); ?>"/>
</form>

<script>
    mauticLang['showMore'] = '<?php echo $view['translator']->trans('mautic.core.more.show'); ?>';
    mauticLang['hideMore'] = '<?php echo $view['translator']->trans('mautic.core.more.hide'); ?>';
</script>

<div id="timeline-table">
    <?php $view['slots']->output('_content'); ?>
</div>
