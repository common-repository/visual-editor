/**
 * Pattern - Section.
 */

/**
 * Dependencies.
 */
import LayoutLibraryItemCard from "./layout-library-item-card";
import LayoutLibraryItemList from "./layout-library-item-list";
import { Collections } from "./collections/views/Collections.js";

/**
 * WordPress dependencies.
 */
const { compose } = wp.compose;
const { rawHandler } = wp.blocks;
const { withSelect, withDispatch } = wp.data;
const { Component, Fragment } = wp.element;

class LayoutLibraryItem extends Component {
  constructor() {
    super(...arguments);
  }

  layoutTabContent() {
    let component = [];

    if ("visualedit-patterns-tab-reusable-blocks" === this.props.currentTab) {
      component = <LayoutLibraryItemList {...this.props} />;
    } else if ("visualedit-patterns-tab-collections" === this.props.currentTab) {
      component = <Collections {...this.props} />;
    } else {
      component = <LayoutLibraryItemCard {...this.props} />;
    }

    return component;
  }

  render() {
    return <Fragment>{this.layoutTabContent()}</Fragment>;
  }
}

export default compose(
  /**
   * Use rawHandler to parse html layouts to blocks
   * See https://git.io/fjqGc for details
   */
  withSelect((select, { clientId }) => {
    const { getBlock } = select("core/block-editor");
    const { canUserUseUnfilteredHTML } = select("core/editor");
    const block = getBlock(clientId);
    return {
      block,
      canUserUseUnfilteredHTML: canUserUseUnfilteredHTML(),
    };
  }),
  withDispatch((dispatch, { block, canUserUseUnfilteredHTML }) => ({
    import: (blockLayout) =>
      dispatch("core/block-editor").replaceBlocks(
        block.clientId,
        rawHandler({
          HTML: blockLayout,
          mode: "BLOCKS",
          canUserUseUnfilteredHTML,
        })
      ),
  }))
)(LayoutLibraryItem);
