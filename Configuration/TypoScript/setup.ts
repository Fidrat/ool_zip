
plugin.tx_oolzip_zip {
    view {
        templateRootPaths.0 = EXT:ool_zip/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_oolzip_zip.view.templateRootPath}
        partialRootPaths.0 = EXT:ool_zip/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_oolzip_zip.view.partialRootPath}
        layoutRootPaths.0 = EXT:ool_zip/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_oolzip_zip.view.layoutRootPath}
    }
    persistence {
        #storagePid = {$plugin.tx_oolzip_zip.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        #ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        #requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}

# Loading ext specific resources
[globalVar = LIT: {$plugin.tx_oolsite.isActive} > 0]
page{
    includeCSS{
        ool_zip_style = {$plugin.tx_oolzip_zip.path.css}style.css
    }
    includeJS{
        ool_zip_js = {$plugin.tx_oolzip_zip.path.js}main.js
    }
}
[else]
page{
    # Should load all libs manually here if ool_site is not present
    # depends on jQuery, tablesorter, clipboard, leaflet and minicss for now on
}
[global]




# these classes are only used in auto-generated templates
plugin.tx_oolzip._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-ool-zip table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-ool-zip table th {
        font-weight:bold;
    }

    .tx-ool-zip table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)
