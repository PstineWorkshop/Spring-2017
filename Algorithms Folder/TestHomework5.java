// Test driver for the Homework5 class
// Do not make any changes to this file!
// Xiwei Wang

import java.util.Arrays;

public class TestHomework5 
{
    public static void main(String[] args)
    {
        Homework5 myHW5 = new Homework5();
        
        int n = 0;
        int numCalls = 0;
        int numTotalTests = 0;
                
        // Test 1
        numTotalTests++;
        int iReturn = -1;
        String eMsg = "N/A";
        try
        {
            n = 3;  // number of queens
            numCalls = 19;
            myHW5.setNumQueens(n);
            System.out.println("Test " + numTotalTests + " - queens(" + n + "):");
            myHW5.queens(0);
            iReturn = myHW5.getCalls();
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println(" Expected: # calls = " + numCalls);
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: # calls = " + iReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");
        
        // Test 2
        numTotalTests++;
        iReturn = -1;
        eMsg = "N/A";
        try
        {
            n = 4;  // number of queens
            numCalls = 27;
            myHW5.setNumQueens(n);
            System.out.println("Test " + numTotalTests + " - queens(" + n + "):");
            myHW5.queens(0);
            iReturn = myHW5.getCalls();
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println(" Expected: # calls = " + numCalls);
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: # calls = " + iReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");   
        
        // Test 3
        numTotalTests++;
        iReturn = -1;
        eMsg = "N/A";
        try
        {
            n = 6;  // number of queens
            numCalls = 172;
            myHW5.setNumQueens(n);
            System.out.println("Test " + numTotalTests + " - queens(" + n + "):");
            myHW5.queens(0);
            iReturn = myHW5.getCalls();
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println(" Expected: # calls = " + numCalls);
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: # calls = " + iReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");          
    }
    
    public static void printSolution(int[] col)
    {
        int n = col.length;
        
        for (int j = 1; j <= n; j++)
        {
            for (int k = 1; k <= n; k++)
            {
                if (k == col[j])
                    System.out.print("Q" + " ");                 
                else
                    System.out.print("- ");
            }

            System.out.println();
        }        
    }
}