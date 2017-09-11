// Test driver for the Homework4 class
// Do not make any changes to this file!
// Xiwei Wang

import java.util.Arrays;

public class TestHomework4 
{
    private static final int inf = 99999;
    
    public static void main(String[] args)
    {        
        Homework4 myHW4 = new Homework4();        
        int n = 0;
        int[][] W = null;
        int numPassedTests = 0;
        int numTotalTests = 0;
        String testResult;
        
        // Test 1
        numTotalTests++;
        String sReturn = "";
        testResult = "[Failed]";
        String eMsg = "N/A";
        try
        {
            int[][] testMatrix = {
                {0, 0, 0, 0, 0, 0},
                {0, 0, 7, 4, 6, 1},
                {0, inf, 0, inf, inf, inf},
                {0, inf, 2, 0, 5, inf},
                {0, inf, 3, inf, 0, inf},
                {0, inf, inf, inf, 1, 0}
                };
            
            n = 5;
            W = testMatrix;
            
            sReturn = myHW4.dijkstra(n, W);
            
            if (sReturn.equals("(v1, v5), (v5, v4), (v1, v3), (v4, v2)"))
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println("Test " + numTotalTests + ": dijsktra(" + n + ", W) - " + testResult);
        printW(W);
        System.out.println(" Expected: (v1, v5), (v5, v4), (v1, v3), (v4, v2)");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: " + sReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");
        
        // Test 2
        numTotalTests++;
        sReturn = "";
        testResult = "[Failed]";
        eMsg = "N/A";
        try
        {
            int[][] testMatrix = {
                {0, 0, 0, 0, 0, 0},
                {0, 0, 1, inf, 3, 10},
                {0, inf, 0, 5, inf, inf},
                {0, inf, inf, 0, inf, 1},
                {0, inf, inf, 2, 0, 6},
                {0, inf, inf, inf, inf, 0}
                };
            
            n = 5;
            W = testMatrix;
            
            sReturn = myHW4.dijkstra(n, W);
            
            if (sReturn.equals("(v1, v2), (v1, v4), (v4, v3), (v3, v5)"))
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println("Test " + numTotalTests + ": dijsktra(" + n + ", W) - " + testResult);
        printW(W);
        System.out.println(" Expected: (v1, v2), (v1, v4), (v4, v3), (v3, v5)");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: " + sReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");  
        
        // Test 3
        numTotalTests++;
        sReturn = "";
        testResult = "[Failed]";
        eMsg = "N/A";
        try
        {
            int[][] testMatrix = {
                {0, 0, 0, 0, 0, 0, 0, 0},
                {0, 0, 5, 3, inf, inf, inf, inf},
                {0, inf, 0, 2, inf, 3, inf, 1},
                {0, inf, inf, 0, 7, 7, inf, inf},
                {0, 2, inf, inf, 0, inf, 6, inf},
                {0, inf, inf, inf, 2, 0, 6, inf},
                {0, inf, inf, inf, inf, inf, 0, inf},
                {0, inf, inf, inf, inf, 1, inf, 0},
                };
            
            n = 7;
            W = testMatrix;
            
            sReturn = myHW4.dijkstra(n, W);
            
            if (sReturn.equals("(v1, v3), (v1, v2), (v2, v7), (v7, v5), (v5, v4), (v5, v6)"))
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println("Test " + numTotalTests + ": dijsktra(" + n + ", W) - " + testResult);
        printW(W);
        System.out.println(" Expected: (v1, v3), (v1, v2), (v2, v7), (v7, v5), (v5, v4), (v5, v6)");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: " + sReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");   
        
        // Test 4
        numTotalTests++;
        sReturn = "";
        testResult = "[Failed]";
        eMsg = "N/A";
        try
        {
            int[][] testMatrix = {
                {0, 0, 0, 0, 0, 0, 0, 0, 0, 0},
                {0, 0, 1, inf, inf, inf, inf, inf, inf, inf},
                {0, inf, 0, 1, inf, inf, inf, inf, inf, 3},
                {0, inf, inf, 0, 2, 4, inf, inf, inf, inf},
                {0, inf, inf, 2, 0, 3, inf, inf, inf, inf},
                {0, inf, inf, inf, inf, 0, 5, inf, inf, inf},
                {0, inf, inf, inf, inf, inf, 0, inf, inf, inf},
                {0, inf, inf, inf, inf, inf, inf, 0, 3, 4},
                {0, 4, inf, inf, inf, inf, inf, 3, 0, 7},
                {0, inf, inf, inf, inf, 3, 5, inf, inf, 0},
                };
            
            n = 9;
            W = testMatrix;
            
            sReturn = myHW4.dijkstra(n, W);
            
            if (sReturn.equals("(v1, v2), (v2, v3), (v3, v4), (v2, v9), (v3, v5), (v9, v6), (v9, v6), (v6, v7)"))
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println("Test " + numTotalTests + ": dijsktra(" + n + ", W) - " + testResult);
        printW(W);
        System.out.println(" Expected: (v1, v2), (v2, v3), (v3, v4), (v2, v9), (v3, v5), (v9, v6), (v9, v6), (v6, v7)");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: " + sReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");        
    }
    
    public static void printW(int[][] W)
    {
        System.out.println("W = ");
        for (int i = 1; i < W.length; i++)
        {
            for (int j = 1; j < W[i].length; j++)
                if (W[i][j] == inf)
                    System.out.format("%-6s", "∞");
                else
                    System.out.format("%-6d", W[i][j]);
            
            System.out.println();
        }        
    }
}