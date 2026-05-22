import { debounce } from "lodash";

class WindowSize {
  private static instance: WindowSize;
  private listeners: Function[] = [];
  private width: number;
  private height: number;

  private constructor() {
    this.width = window.innerWidth;
    this.height = window.innerHeight;

    // Listen to window resize event
    const debouncedResize = debounce(this.handleResize.bind(this), 500);
    jQuery(window).on("resize", debouncedResize);
  }

  // Singleton pattern to get the instance
  public static getInstance(): WindowSize {
    if (!WindowSize.instance) {
      WindowSize.instance = new WindowSize();
    }
    return WindowSize.instance;
  }

  // Getter for window size
  public getSize(): { width: number; height: number } {
    return { width: this.width, height: this.height };
  }

  // Register a listener function to be notified of window size changes
  public addListener(listener: Function): void {
    this.listeners.push(listener);
  }

  // Remove a listener
  public removeListener(listener: Function): void {
    this.listeners = this.listeners.filter((l) => l !== listener);
  }

  // Notify all listeners of window size changes
  private notifyListeners(): void {
    for (const listener of this.listeners) {
      listener(this.width, this.height);
    }
  }

  // Handle the resize event
  private handleResize = (): void => {
    const width = window.innerWidth;
    this.height = window.innerHeight;

    if (width === this.width) return;

    this.width = width;
    this.notifyListeners();
  };
}

export default WindowSize;
