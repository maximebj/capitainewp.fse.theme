wp.domReady(function () {
  for (var block in disableBlocksStyles) {
    disableBlocksStyles[block].forEach(style => {
      wp.blocks.unregisterBlockStyle(block, style);
    });
  }
});
