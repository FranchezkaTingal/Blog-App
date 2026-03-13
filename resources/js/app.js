import React from "react";
import { createRoot } from "react-dom/client";

import Dashboard from "./components/Dashboard";

const element = document.getElementById("dashboard");

if (element) {
    const root = createRoot(element);
    root.render(<Dashboard />);
}