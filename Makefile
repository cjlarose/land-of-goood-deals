SRC_EXT = html
SRC_DIR = .
BUILD_DIR = build

SOURCES = $(shell find $(SRC_DIR) -type f -name *.$(SRC_EXT))
OBJECTS = $(patsubst $(SRC_DIR)/%,$(BUILD_DIR)/%,$(SOURCES))

HEADER_FILE = include/header.html
FOOTER_FILE = include/footer.html

test:
	echo $(OBJECTS)

all: $(OBJECTS)
    
$(BUILD_DIR)/%.html: $(SRC_DIR)/%.html
	mkdir -p $(BUILD_DIR)
	cat $(HEADER_FILE) $< $(FOOTER_FILE) > $@

.PHONY: clean
clean:
	rm -rf $(BUILD_DIR)/*.html
