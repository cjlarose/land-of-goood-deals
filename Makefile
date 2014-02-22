SRC_EXT = html
SRC_DIR = .
BUILD_DIR = build

SOURCES = $(shell ls $(SRC_DIR)/*.$(SRC_EXT))
OBJECTS = $(patsubst $(SRC_DIR)/%,$(BUILD_DIR)/%,$(SOURCES))

HEADER_FILE = include/header.html
FOOTER_FILE = include/footer.html

all: $(OBJECTS) $(BUILD_DIR)/images $(BUILD_DIR)/style.css

$(BUILD_DIR)/images: $(SRC_DIR)/images
	cp -R $(SRC_DIR)/images $(BUILD_DIR)

$(BUILD_DIR)/style.css: $(SRC_DIR)/style.css
	cp $(SRC_DIR)/style.css $(BUILD_DIR)

$(BUILD_DIR)/%.html: $(SRC_DIR)/%.html $(HEADER_FILE) $(FOOTER_FILE)
	mkdir -p $(BUILD_DIR)
	cat $(HEADER_FILE) $< $(FOOTER_FILE) > $@

.PHONY: clean
clean:
	rm -rf $(BUILD_DIR)/*.html
