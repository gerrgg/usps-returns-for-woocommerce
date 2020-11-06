import React, { useState } from "react";

const App = () => {
  const [votes, setVotes] = useState(0);

  return (
    <div>
      <h4>{votes}</h4>
      <button onClick={() => setVotes(votes + 1)}>Vote</button>
    </div>
  );
};

export default App;
