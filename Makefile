all: config install start

config: display.service.example
	@echo "Configuring display.service"
	@sed 's/USER/$(USER)/g' display.service.example > display.service
	@echo "Done"

install: config
	@echo "Installing display.service"
	@sudo cp display.service.example /etc/systemd/system/display.service
	@sudo systemctl enable --now display.service
	@echo "Done"

