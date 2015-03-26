# Introduction #

This is the command to run when invoking the Cake Shell from the "Run" command


# Details #

**Run the below command in the Windows >> Run window.**

The /c switch ensures that the command prompt is closed i.e. exits the window - this is required if you want the task to run in the background and exit.

```

cmd /c "A:&&cd needle&&Console\cake needle" 

```

The /k switch ensures that the command prompt is still active i.e. continues to execute.

```

cmd /k "A:&&cd needle&&Console\cake needle" 

```