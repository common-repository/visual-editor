/**
 * Pattern Importer Modal with tabs.
 */

import LayoutLibrary from "./layout-library";

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { Fragment, useState } = wp.element;
const { Button, Dashicon, Modal, TabPanel } = wp.components;
const { useDispatch } = wp.data;

function LayoutModal(props) {
  const [currentTab, setCurrentTab] = useState("visualedit-patterns-tab-sections");
  const [modalOpen, setModalOpen] = useState(true);
  const { removeBlock } = useDispatch("core/block-editor");

  const tabs = [];

  if (props.context.sections.length > 0) {
    tabs.push({
      name: "visualedit-patterns-tab-sections",
      title: __("Sections", "visual-editor-blocks"),
      className: "visualedit-patterns-tab-sections",
    });
  }

  if (props.context.layouts.length > 0) {
    tabs.push({
      name: "visualedit-patterns-tab-layouts",
      title: __("Pages", "visual-editor-blocks"),
      className: "visualedit-patterns-tab-layouts",
    });
  }

  tabs.push({
    name: "visualedit-patterns-tab-favorites",
    title: __("Favorites", "visual-editor-blocks"),
    className: "visualedit-patterns-tab-favorites",
  });

  if (props.context.reusableBlocks.length) {
    tabs.push({
      name: "visualedit-patterns-tab-reusable-blocks",
      title: __("Reusable Blocks", "visual-editor-blocks"),
      className: "visualedit-patterns-tab-reusable-blocks",
    });
  }

  return (
    <Fragment key={"pattern-modal-" + props.clientId}>
      <Button
        key={"layout-modal-library-button-" + props.clientId}
        isPrimary
        className="visualedit-pattern-modal-button"
        onClick={() => {
          setModalOpen(true);
        }}
      >
        {__("Layout Library", "visual-editor-blocks")}
      </Button>
      {modalOpen ? (
        <Modal
          shouldCloseOnClickOutside={false}
          key={"modal-component-" + props.clientId}
          className="visualedit-pattern-importer-modal"
          title={__(
            "Visual Editor Blocks Library",
            "visual-editor-blocks"
          )}
          onRequestClose={() => {
            setModalOpen(false);
            setCurrentTab(null);
            removeBlock(props.clientId);
          }}
        >
          <TabPanel
            key={"layout-modal-tabpanel-" + props.clientId}
            className="visualedit-pattern-importer-modal-panel"
            activeClass="visualedit-pattern-importer-modal-active-tab"
            onSelect={(tabName) => setCurrentTab(tabName)}
            tabs={tabs}
          >
            {(tab) => {
              const tabContent = __(
                "Default tab content",
                "visual-editor-blocks"
              );

              if (tab.name) {
                if ("visualedit-patterns-tab-sections" === tab.name) {
                  return [
                    <LayoutLibrary
                      key={"pattern-modal-sections-" + props.clientId}
                      clientId={props.clientId}
                      currentTab={currentTab}
                      data={props.context.sections}
                      context={props.context}
                    />,
                  ];
                }

                if ("visualedit-patterns-tab-layouts" === tab.name) {
                  return [
                    <LayoutLibrary
                      key={"pattern-modal-layouts-" + props.clientId}
                      clientId={props.clientId}
                      currentTab={currentTab}
                      data={props.context.layouts}
                      context={props.context}
                    />,
                  ];
                }

                if ("visualedit-patterns-tab-collections" === tab.name) {
                  return [
                    <LayoutLibrary
                      key={"pattern-modal-collections-" + props.clientId}
                      clientId={props.clientId}
                      currentTab={currentTab}
                      data={props.context.collections}
                      context={props.context}
                    />,
                  ];
                }

                if ("visualedit-patterns-tab-favorites" === tab.name) {
                  return [
                    <LayoutLibrary
                      key={"pattern-modal-favorites-" + props.clientId}
                      clientId={props.clientId}
                      currentTab={currentTab}
                      data={props.context.favorites}
                      context={props.context}
                    />,
                  ];
                }

                if ("visualedit-patterns-tab-reusable-blocks" === tab.name) {
                  return [
                    <LayoutLibrary
                      key={"pattern-modal-reusable-blocks-" + props.clientId}
                      clientId={props.clientId}
                      currentTab={currentTab}
                      data={props.context.reusableBlocks}
                      context={props.context}
                    />,
                  ];
                }
              }
              return <div>{tabContent}</div>;
            }}
          </TabPanel>
        </Modal>
      ) : null}
    </Fragment>
  );
}
export default LayoutModal;
