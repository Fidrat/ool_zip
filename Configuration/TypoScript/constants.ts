
plugin.tx_oolzip_zip {
    view {
        # cat=plugin.tx_oolzip_zip/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:ool_zip/Resources/Private/Templates/
        # cat=plugin.tx_oolzip_zip/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:ool_zip/Resources/Private/Partials/
        # cat=plugin.tx_oolzip_zip/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:ool_zip/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_oolzip_zip//a; type=string; label=Default storage PID
        #storagePid = 14
    }

    path{
        css = EXT:ool_zip/Resources/Public/Css/
        js = EXT:ool_zip/Resources/Public/Js/
    }
}
