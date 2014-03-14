PWD = $(shell pwd)
SRC_DIR = $(PWD)
SRC_EXT = html
BUILD_DIR = $(PWD)/build

SOURCES = $(shell ls $(SRC_DIR)/*.$(SRC_EXT))
OBJECTS = $(patsubst $(SRC_DIR)/%,$(BUILD_DIR)/%,$(SOURCES))

HEADER_FILE = include/header.html
FOOTER_FILE = include/footer.html

all: directories $(OBJECTS) $(BUILD_DIR)/images $(BUILD_DIR)/style.css

directories:
	mkdir -p $(BUILD_DIR)
	ln -s $(SRC_DIR)/js $(BUILD_DIR)/js
	ln -s $(SRC_DIR)/json $(BUILD_DIR)/json

$(BUILD_DIR)/images: $(SRC_DIR)/images
	cp -R $(SRC_DIR)/images $(BUILD_DIR)

$(BUILD_DIR)/style.css: $(SRC_DIR)/style.css
	cp $(SRC_DIR)/style.css $(BUILD_DIR)

$(BUILD_DIR)/%.html: $(SRC_DIR)/%.html $(HEADER_FILE) $(FOOTER_FILE)
	cat $(HEADER_FILE) $< $(FOOTER_FILE) > $@

.PHONY: clean
clean:
	rm -rf $(BUILD_DIR)/*.html
	rm -rf $(BUILD_DIR)/js $(BUILD_DIR)/json
