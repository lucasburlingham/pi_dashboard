import dbus


session_bus = dbus.SessionBus()
spotify_bus = session_bus.get_object("org.mpris.MediaPlayer2.spotify",
                                     "/org/mpris/MediaPlayer2")
spotify_properties = dbus.Interface(spotify_bus,
                                    "org.freedesktop.DBus.Properties")
metadata = spotify_properties.Get("org.mpris.MediaPlayer2.Player", "Metadata")

f = open('song.txt', 'w')

# The property Metadata behaves like a python dict
for key, value in metadata.items():
	print(key, value)
	# output to song.txt
	
	f.write(str(key) + ';' + str(value) + "\n")

f.close()