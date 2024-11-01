/**
 * BLOCK: Pattern Importer Layout
 */

/**
 * Import dependencies.
 */
import Edit from "./components/edit";
import "./styles/style.scss";
import "./styles/styles.editor.scss";
import LayoutsProvider from "./components/layouts-provider";


/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

/**
 * Register the block
 */
registerBlockType("visual-editor-blocks/visualedit-templates", {
  title: __("VISUALEDIT Templates", "visual-editor-blocks"),
  description: __(
    "This allows you to add pre-designed blocks and layouts to your page.",
    "visual-editor-blocks"
  ),
  category: "visual_editor_blocks",
  keywords: [
    __("patterns", "visual-editor-blocks"),
    __("importer", "visual-editor-blocks"),
    __("layouts", "visual-editor-blocks"),
  ],

  /* Render the block in editor. */
  edit: (props) => {
    return (
      <LayoutsProvider>
        <Edit {...props} />
      </LayoutsProvider>
    );
  },

  /* Save the block markup. */
  save: () => {
    return null;
  },
});

/**
 * Add a Pattern Importer button to the toolbar.
 */
let patternButtonExist = false;
wp.data.subscribe(() => {
  appendImportButton();
});

/**
 * Build the pattern importer button.
 */
function appendImportButton() {
  if (patternButtonExist) {
    return;
  }
  const toolbar = document.querySelector(".edit-post-header__toolbar");
  if (!toolbar) {
    return;
  }
  const buttonDiv = document.createElement("div");
  buttonDiv.classList.add("visualedit-pattern-wrapper");
  let html = '<div class="visualedit-import-pattern">';
  html += `<button id="patternButton" class="components-button components-icon-button" aria-label="${__(
    "Import Pattern",
    "visual-editor-blocks"
  )}"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="30" height="30" viewBox="0 0 30 30">
  <image xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAARCAMAAAD5TTx4AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACDVBMVEUAAACZEZmZEZmZEZmZEZmZEZmZEZmZEZmZEZmZEZmZEZmZEZmZEZmZEZmZEZmZEZmZEZmZEZmZEZmZEZmZEZmZEZmZEZmZEZmZEZmWEJeZEZmZEZmZEZmZEZmZEZmZEZmbEpubEpubEpuaEpqXEJePDY+HC4eZEZmZEZmZEZmZEZmZEZmZEZmZEZmXEJaRDpCRD5CQD5CQDpCODo6HDId9CHx5B3iZEZmZEZmZEZmZEZmdEp2ODo2ZEZmZEZmZEZmbEZubD5uECoRzBHJzBXN0BXN0BHR0A3R1BHWZEZmZEZmZEZmZEZmZEZmZEZmYE5eDEYJ0AnR1BHWZEZmZEZmZEZmZEZmcEJySF5BrHGhwDW91BHWZEZmZEZmZEZmZEZmZEZmZEZmYD5iAEH9vGG11BHWZEZmZEZmZEZmZEZmbEZuYEZh2B3RyB3F1BHV1BXV1BnSZEZmZEZmZEZmYEJiZEZmZEZmZEZmZEZmZEZmcEpqPDY9wAnB0BHR1BHV1BHV1BXV1BXWZEZmbEJR7B3tzBHN1BHV1BXV1BHWZEZmcEph6BnlyBHN1BHWZEZmZEZiUD5R0BHR0BHR1BHWZEZmaEZeaEZiZEZqBCIFzA3N1BHV1BHV1BHV1BHWZEZmYEZmaEZp0BHN1BXZ1BXV1BHV0CnN1BnRzD3F0CXR1BXSZEZqbEZeaEZeZEZgAAAD0c1oMAAAAnnRSTlMAq+7w0TsTnffq69g++aoFAVfvBI/tWh3N7iHovA5w++Tg4eHh4c8CZ/79eCjnuTgrMDAwMDAoutsto+w+iwZF/IYKYWdlZWVXCI3mPwnIzRF96N6iC2X4XCzw4QNv81EW3Lobz+8St8uV9j4UjYSEcklbNZ8HmNXP/OQVDBMPEBANKmAk19nZu33LDrvkD8M/XP7fN8TneRHL7Orrys6UzVoAAAABYktHRACIBR1IAAAACXBIWXMAAFxGAABcRgEUlENBAAABPklEQVQY02XQZVMCURiG4aNYKIrdGBjY3Z3Y3Y3dHYiJBXZ3PK6Krf9RdoGFGe9P79lrzrxnlhgZc0xMiUFm5hZcJksrwrMGbPh6s7WDLnvi4Ag4OevRxVVnj26EuHsAngIWvQBvH1+h0M8/IJAQUVAwQkJFWgsLBxURGRUdExsXn6A+CxKBpGSN8VOA1DTD9/E4QHoGM2YCWdk5uXn54gKxuJD+UlQMlJTSU1k5qIrKqqfnF5W6as2iGqC2Tj3UAw2NTc2vb7SpWhhsbQPaOwiRdILq6u55//hksFezta8fGJCQQWBoeGR0TNP4hPZNk1xgapqLrxnyv9k5QDovw8Li0vLKKp1cLl/T6bqU/mPfG5tbCialUqHYZu/uyNS4u7ev0nfA4uHRzy91fHJqgGf6tecXl1fXN7d3bPcPf6hBir2QY4FPAAAAAElFTkSuQmCC" x="1" y="7" width="28" height="17"/>
</svg> ${__(
    "Block Visual Editor Templates",
    "visual-editor-blocks"
  )}</button>`;
  html += "</div>";
  buttonDiv.innerHTML = html;
  toolbar.appendChild(buttonDiv);

  const innerToolbar = document.querySelector(
    ".components-accessible-toolbar.edit-post-header-toolbar"
  );
  if (innerToolbar) {
    innerToolbar.style.flexGrow = 0;
  }

  document
    .getElementById("patternButton")
    .addEventListener("click", visualeditRenderModalBlock);

  patternButtonExist = true;
}

/**
 * Render block (Modal) on click.
 */
function visualeditRenderModalBlock() {
  let {rootClientId,index} = wp.data.select( 'core/editor' ).getBlockInsertionPoint();
  const block = wp.blocks.createBlock(
    "visual-editor-blocks/visualedit-templates"
  );
  wp.data.dispatch("core/block-editor").insertBlocks(block,index,rootClientId);
}
