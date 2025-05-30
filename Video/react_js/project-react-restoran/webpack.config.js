// ... existing code ...
module.exports = {
  // ... other config ...
  devServer: {
    // Replace deprecated options:
    // onBeforeSetupMiddleware: ...
    // onAfterSetupMiddleware: ...
    
    // With the new setupMiddlewares:
    setupMiddlewares: (middlewares, devServer) => {
      if (!devServer) {
        throw new Error('webpack-dev-server is not defined');
      }
      
      // Add your custom middleware here
      // Example:
      // middlewares.unshift({
      //   name: 'first',
      //   path: '/api',
      //   middleware: (req, res) => {
      //     res.json({ custom: 'response' });
      //   },
      // });
      
      return middlewares;
    },
    // ... other devServer options ...
  }
};